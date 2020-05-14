import React, {Component} from "react";
import './App.css'
import Headers from "./Partitions/Headers";
import Books from './Partitions/Books'

class App extends React.Component {


    constructor(props, context) {
        super(props, context);
        this.state = {
            count:0 ,
        } ;
        this.increament = this.increament.bind(this);
        this.decreament = this.decreament.bind(this) ;
        this.reset = this.reset.bind(this) ;

    }

    increament(){
        this.setState((prevSate) => {
            return{
                count: prevSate.count + 1
            }
        }) ;
    } ;

    decreament(){
        this.setState((prevSate) => {
            return{
                count: prevSate.count - 1
            }
        }) ;
    }

    reset(){
        this.setState((prevSate) => {
            return{
                count: 0
            }
        }) ;
    }

    render(){
        return(
            <div>
                <Headers age = '5' />
                <div>number:{this.state.count}</div>
                <button onClick={() => this.increament()}>inc</button>
                <button onClick={() => this.decreament()}>dec</button>
                <button onClick={() => this.reset()}>reset</button>


                <Books/>


            </div>
        ) ;
    }
}

export default App ;
