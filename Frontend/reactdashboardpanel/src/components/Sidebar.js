import React from 'react';
import './Sidebar.css'; 


function Sidebar () {
    return (
        <aside className="sidebar">
            <h2 className='sidebar-title'>
                    
            </h2>
            <nav className='sidebar-nav'>
                <a href='#dashboard' className='nav-item'>Inicio</a>
                <a href='#turnos' className='nav-item'>Turnos</a>
                <a href='#pacientes' className='nav-item'>Pacientes</a>
                <a href='#medicos' className='nav-item'>Medicos</a>
                <a href='#config' className='nav-item'>Configuracion</a>
            </nav>
        </aside>
    );
}

export default Sidebar;