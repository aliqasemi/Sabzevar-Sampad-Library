import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'


/// state , probs , component



class BookList extends Component{
    constructor(props, context) {
        super(props, context);
        this.state = {
            error : null ,
            isLoaded: false ,
            items:[]
        } ;
    }

    componentDidMount() {
        fetch('http://127.0.0.1:8000/api/book/')
            .then(res => res.json())
            .then(
                (json) => {
                    this.setState((prevSate) => {
                        return{
                            isLoaded: true ,
                            items: json.data
                        }
                    }) ;
                } ,
                (error) => {
                    this.setState((prevState) => {
                        return{
                            isLoaded:true ,
                            error: error
                        }
                    }) ;
                }
            )
    }

    render() {

        const error = this.state.error ;
        const isLoaded = this.state.isLoaded ;
        const items =  this.state.items ;

        if (error) {
            return(<div> Error : {error.message}</div>)
        }
        else if(!isLoaded){
            return(
                <div className='container py-4' style={{direction:"rtl", textAlign:"center"}}>
                    <div className='row justify-content-center'>
                        <div className='col-md-6'>
                            <div className='card'>
                                <div className='card-header'>در حال پردازش اطلاعات</div>
                                <div className="lds-roller" >
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ) ;
        }
        else {
            return(
                <div>
                    <div className='container py-4' style={{direction:"rtl", textAlign:"right"}}>
                        <div className='row justify-content-center'>
                                    <div className='col-md-8'>
                                        <div className='card'>
                                            <div className='card-header'>لیست تمامی کتاب ها</div>
                                            <div className='card-body'>
                                                <Link className='btn btn-primary btn-sm mb-3' to='/create'>
                                                    ایجاد کتاب جدید
                                                </Link>
                                                <ul className='list-group list-group-flush'>
                                                    {items.map(book => (
                                                        <Link
                                                            className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                                                            to={`/${book.id}`}
                                                            key={book.id}
                                                        >
                                                            {book.name}
                                                            <span className='badge badge-primary badge-pill'>
                            {book.author}
                          </span>
                                                        </Link>
                                                    ))}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        )
                </div>
            );
        }
    }
}

export default BookList
