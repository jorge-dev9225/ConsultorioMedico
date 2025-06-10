import React from 'react';
import './Navbar.css'; 

export default function Navbar() {
  return (
    <nav className="navbar">
      <div className="navbar-logo">
        {/* Aquí puede ir el logo o el nombre de la app */}
        <h2>MiConsultorio</h2>
      </div>
      
      <ul className="navbar-links">
        <li><a href="#dashboard">Dashboard</a></li>
        <li><a href="#turnos">Turnos</a></li>
        <li><a href="#perfil">Perfil</a></li>
        <li><a href="#salir">Salir</a></li>
      </ul>
    </nav>
  );
}
