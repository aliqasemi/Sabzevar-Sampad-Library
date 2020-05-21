import axios from 'axios'
import React, { Component } from 'react'


class NewBook extends Component{

    constructor(props, context) {

        super(props, context);
        this.state = {
            name: '' ,
            author : '' ,
            subject : '' ,
            shabak : '' ,
            errors : '' ,
        }

        this.handleFieldChange = this.handleFieldChange.bind(this)
        this.handleCreateNewBook = this.handleCreateNewBook.bind(this)
        this.hasErrorFor = this.hasErrorFor.bind(this)
        this.renderErrorFor = this.renderErrorFor.bind(this)

    }

    handleFieldChange(event){
        /*if (field == "name"){
            this.setState({
                [event.target.name] : event.target.value ,
            })
        }
        else if (field == "author"){
            this.setState({
                [event.target.author] : event.target.value ,
            })
        }
        else if (field == "subject"){
            this.setState({
                [event.target.subject] : event.target.value ,
            })
        }
        else if (field == "shabak"){
            this.setState({
                [event.target.shabak] : event.target.value ,
            })
        }*/

        this.setState({
            [event.target.name] : event.target.value ,
        })

    }

    handleCreateNewBook(event){
        event.preventDefault()
        const { history } = this.props
        const book = {
            name : this.state.name ,
            author : this.state.author ,
            subject : this.state.subject ,
            shabak : this.state.shabak
        }

        axios.post('api/book' , book)
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
        return (
            <div className='container py-4' style={{direction:"rtl", textAlign:"right"}}>
                <div className='row justify-content-center'>
                    <div className='col-md-6'>
                        <div className='card'>
                            <div className='card-header'>ایجاد کتاب جدید</div>
                            <div className='card-body'>
                                <form onSubmit={this.handleCreateNewBook}>
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
                                    <button className='btn btn-primary'>ایجاد کتاب جدید</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }

}


export default NewBook
