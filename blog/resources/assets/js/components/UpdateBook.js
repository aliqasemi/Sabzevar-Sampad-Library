import axios from 'axios'
import React, { Component } from 'react'


class UpdateBook extends Component{

    constructor(props, context) {

        super(props, context);
        this.state = {
            name: '' ,
            author : '' ,
            subject : '' ,
            shabak : '' ,
            book : {} ,
            isLoaded: false ,
            error : null ,
            errors : '' ,
            book_update : {}
        }


        this.handleFieldChange = this.handleFieldChange.bind(this)
        this.handleUpdateBook = this.handleUpdateBook.bind(this)
        this.hasErrorFor = this.hasErrorFor.bind(this)
        this.renderErrorFor = this.renderErrorFor.bind(this)
        this.onLoadPage = this.onLoadPage.bind(this)
        this.handleDefaultValue = this.handleDefaultValue.bind(this)

    }

    handleDefaultValue(){
        this.setState({
            name : this.state.book.name ,
            author : this.state.book.author ,
            subject : this.state.book.subject ,
            shabak : this.state.book.shabak
        })
    }

    componentDidMount() {
        const bookId = this.props.match.params.id
        axios.get(`/api/book/${bookId}`).then(
            response => {
                this.setState({
                    book : response.data ,
                    isLoaded: true ,
                })
             this.handleDefaultValue()
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

    onLoadPage(event){
        this.setState({
            isLoaded: true
        })
    }

    handleFieldChange(event){
        this.setState({
            [event.target.name] : event.target.value ,
        })
    }


    handleUpdateBook(event){
        event.preventDefault()
        const { history } = this.props
        this.setState(
            this.state.book_update = {
                name : this.state.name ,
                author : this.state.author ,
                subject : this.state.subject ,
                shabak : this.state.shabak
            }
        )

        const bookId = this.state.book.id

        axios.put(`/api/book/${bookId}` , this.state.book_update)
            .then(response => history.push('/')
                .cache(error => {
                    this.setState({
                            errors: error.response.data.errors
                        }
                    )}))
    }

    hasErrorFor (field) {
        return this.state.errors[field]
    }

    renderErrorFor (field) {
        if (this.hasErrorFor(field)) {
            return (
                <span className='invalid-feedback'>
                <strong>{this.state.errors[field][0]}</strong>
            </span>
            )
        }
    }


    render () {
        const isLoaded = this.state.isLoaded ;
        if (!isLoaded){
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
            );
        }
        else{
            return (
                <div className='container py-4' style={{direction:"rtl", textAlign:"right"}}>
                    <div className='row justify-content-center'>
                        <div className='col-md-6'>
                            <div className='card'>
                                <div className='card-header'>ویرایش کتاب</div>
                                <div className='card-body'>
                                    <form onSubmit={this.handleUpdateBook}  >
                                        <div className='form-group'>
                                            <label htmlFor='name'>نام کتاب</label>
                                            <input
                                                id='name'
                                                type='text'
                                                className={`form-control ${this.hasErrorFor('name') ? 'is-invalid' : ''}`}
                                                name='name'
                                                value={this.state.name}
                                                onChange={this.handleFieldChange}

                                            />
                                            {this.renderErrorFor('name')}
                                        </div>
                                        <div className='form-group'>
                                            <label htmlFor='author'>نام نویسنده</label>
                                            <input
                                                id='author'
                                                type='text'
                                                className={`form-control ${this.hasErrorFor('author') ? 'is-invalid' : ''}`}
                                                name='author'
                                                value={this.state.author}
                                                onChange={this.handleFieldChange}
                                            />
                                            {this.renderErrorFor('author')}
                                        </div>
                                        <div className='form-group'>
                                            <label htmlFor='subject'>موضوع کتاب</label>
                                            <input
                                                id='subject'
                                                type='text'
                                                className={`form-control ${this.hasErrorFor('subject') ? 'is-invalid' : ''}`}
                                                name='subject'
                                                value={this.state.subject}
                                                onChange={this.handleFieldChange}
                                            />
                                            {this.renderErrorFor('subject')}
                                        </div>
                                        <div className='form-group'>
                                            <label htmlFor='shabak'>شماره شابک</label>
                                            <input
                                                id='shabak'
                                                type='text'
                                                className={`form-control ${this.hasErrorFor('shabak') ? 'is-invalid' : ''}`}
                                                name='shabak'
                                                value={this.state.shabak}
                                                onChange={this.handleFieldChange}
                                            />
                                            {this.renderErrorFor('shabak')}
                                        </div>
                                        <button className='btn btn-primary'>ویرایش کتاب</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            )
        }

    }

}


export default UpdateBook
