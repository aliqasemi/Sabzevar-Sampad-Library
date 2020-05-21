import React from 'react'
import { Link } from 'react-router-dom'

const Header = () => (
    <nav className='navbar navbar-expand-md navbar-light navbar-laravel' style={{direction:"rtl", textAlign:"right"}}>
        <div className='container'>
            <Link className='navbar-brand' to='/'>کتاب ها</Link>
        </div>
    </nav>
)

export default Header
