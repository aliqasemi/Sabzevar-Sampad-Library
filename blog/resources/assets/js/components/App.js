import React , {Component} from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Headers from './Headers'
import BookList from './BookList'
import NewBook from './NewBook'
import BookDetail from './BookDetail'
import UpdateBook from './UpdateBook'





class App extends Component {

// state component probs <img with = "20px" />

    render () {

        return (
            <div>
                <BrowserRouter>
                    <div>
                        <Headers />
                        <Switch>
                            <Route exact path='/' component={BookList}/>
                            <Route path='/update/:id' component={UpdateBook} />
                            <Route path='/create' component={NewBook} />
                            <Route path='/:id' component={BookDetail} />
                        </Switch>
                    </div>
                </BrowserRouter>
            </div>


        )
    }
}

ReactDOM.render(<App />, document.getElementById('app'))
