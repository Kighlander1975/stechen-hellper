import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'

function App() {
    return (
        <div className="container my-5">
            <h1 className="text-success">
                <i className="fas fa-check-circle"></i> It works!
            </h1>
            <p>Bootstrap & Font Awesome sind <b>lokal</b> eingebunden.</p>
            <button className="btn btn-primary me-2">
                <i className="fas fa-thumbs-up"></i> Bootstrap-Button
            </button>
            <button className="btn btn-outline-secondary">
                <i className="far fa-smile"></i> Noch ein Button
            </button>
        </div>
    );
}
export default App;
