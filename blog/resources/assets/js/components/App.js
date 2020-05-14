import React , {Component} from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Headers from './Headers'
import BookList from './BookList'

class App extends Component {


    render () {
        return (
            <div>

                <BrowserRouter>
                    <div>
                        <Headers />
                        <Switch>
                            <Route exact path='/' component={BookList}/>
                        </Switch>
                    </div>
                </BrowserRouter>


            </div>


        )
    }
}

ReactDOM.render(<App />, document.getElementById('app'))
