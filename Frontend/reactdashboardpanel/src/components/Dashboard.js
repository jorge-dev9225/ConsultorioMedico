import React, { useEffect, useState } from 'react';
import axios from 'axios';
import './Dashboard.css';


function Dashboard() {
    const  [stats, setStats] = useState({
        pendientes: 0,
        confirmados: 0,
        cancelados: 0, 
    });

    const [appointments, setAppointments] = useState([]);
        
    const token = localStorage.getItem('token');
    
    const headers = {Authorization: `Bearer ${token}`};
    
//obtiene estadisticas y turnos solicitados

    useEffect(() => {
        axios.get('http://127.0.0.1:8000/api/estadisticas', { headers })
        .then(response => setStats(response.data))
        .catch(error => console.log('Error al obtener las estadísticas:', error));
        
        axios.get('http://127.0.0.1:8000/api/appointments', { headers })
        .then(response => setStats(response.data))
        .catch(error => console.log('Error al obtener Turnos:', error));    
    }, []);

    const confirmarTurno = (id) => {
        axios.put(`http://127.0.0.1:8000/api/appointments/${id}/confirm`, { headers})
        .then(() => {
            setAppointments(prev => prev.map(a => a.id === id ? {...a, status: 'Confirmed'} : a));
            setStats(prev => ({...prev,
                pendientes: prev.pendientes - 1,
                confirmados: prev.confirmados + 1,
            }));
        });
    };

    const cancelarTurno = (id) => {
        axios.put(`http://127.0.0.1:8000/api/appointments/${id}/cancel`, { headers})
        .then(() => {
            setAppointments(prev => prev.map(a => a.id === id ? {...a, status: 'Cancelled'} : a));
            setStats(prev => ({...prev,
                pendientes: prev.pendientes - 1,
                cancelados: prev.cancelados + 1,
            }));
        });
    };

    return (
        <section className='dashboard'>
            <h1 className='dashboard-title'>Panel del Administrador</h1>
            <div className='cards-container'>
                <div className='card'>
                    <span className='card-number'>{stats.pendientes}</span>
                    <span className='card-label'>Turnos Pendientes</span>
                </div>

                <div className='card'>
                    <span className='card-number'>{stats.confirmados}</span>
                    <span className='card-label'>Turnos confirmados</span>
                </div>

                <div className='card'>
                    <span className='card-number'>{stats.cancelados}</span>
                    <span className='card-label'>Turnos Cancelados</span>
                </div>
            </div>
        <table className='appointments-table'>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                {appointments.map(appt => (
                    <tr key={appt.id}>
                        <td>{appt.patient_name}</td>
                        <td>{appt.specialty}</td>
                        <td>{appt.date}</td>
                        <td>{appt.time}</td>
                        <td>{appt.status}</td>
                        <td>
                            {appt.status === 'pending' && (
                                <>
                                <button onClick={() => confirmarTurno(appt.id)}>Confirmar</button>
                                <button onClick={() => cancelarTurno(appt.id)}>Cancelar</button>
                                </>
                            )}
                            {appt.status === 'confirmed' &&  <span>✔️ Confirmado</span>}
                            {appt.status === 'cancelled' &&  <span>❌ Cancelado</span>}
                        </td>  
                    </tr>
                ))}
            </tbody>
        </table>
    </section>
    );
}

export default Dashboard;

