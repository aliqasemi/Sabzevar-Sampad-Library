import axios from 'axios'
import React , {Component} from 'react'
import {Link} from "react-router-dom";


class BookDetail extends Component{


    constructor(props, context) {
        super(props, context);
        this.state = {
            book : {} ,
            condition : "آزاد" ,
            isLoaded: false ,
        }
        this.handleDeleteBook = this.handleDeleteBook.bind(this) ;
    }


    componentDidMount() {
        const bookId = this.props.match.params.id

        axios.get(`/api/book/${bookId}`).then(
            response => {
                this.setState({
                    book : response.data ,
                    isLoaded: true ,
                    condition : "رزرو شده"
                })
            if (this.state.book.lended == 1){
                this.setState({
                    condition : "آزاد"
                })
            }
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

    handleDeleteBook(event){
        event.preventDefault()
        const { history } = this.props
        const bookId = this.state.book.id
        axios.delete(`/api/book/${bookId}`)
            .then(response => {
                return (history.push('/'))
                    .cache(error => {
                        this.setState({
                                errors: error.response.data.errors
                            }
                        )
                    });
            })
    }

    render () {
        const { book , condition , isLoaded  , error} = this.state

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
            return (
                <div className='container py-4' style={{direction:"rtl", textAlign:"right"}}>
                    <div className='row justify-content-center'>
                        <div className='col-md-8'>
                            <div className='card'>
                                <div className='card-header'>{book.name}</div>
                                <div className='card-body'>
                                    <p>  وضعیت کتاب :{condition}</p>
                                    <hr />
                                    <p>نام نویسنده : {book.author}</p>
                                    <hr />
                                    <p>شماره شابک : {book.shabak}</p>
                                    <hr />
                                    <p>موضوع : {book.subject}</p>
                                    <hr />
                                    <button className='btn btn-primary btn-sm mb-3' style={{margin:"0 auto" , textAlign:"center"}} onClick={this.handleDeleteBook}>حذف کتاب</button>
                                    <hr />
                                    <Link className='btn btn-primary btn-sm mb-3' to={`/update/${book.id}`} key={book.id}>
                                        ویرایش کتاب
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            )
        }


    }
}
export default BookDetail
