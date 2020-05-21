import React , {Component} from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Headers from './Headers'
import BookList from './BookList'
import NewBook from './NewBook'





class App extends Component {



    render () {

        return (
            <div>
                <BrowserRouter>
                    <div>
                        <Headers />
                        <Switch>
                            <Route exact path='/' component={BookList}/>
                            <Route path='/create' component={NewBook} />
                        </Switch>
                    </div>
                </BrowserRouter>
            </div>


        )
    }
}

ReactDOM.render(<App />, document.getElementById('app'))
