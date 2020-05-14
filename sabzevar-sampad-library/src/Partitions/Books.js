import React from "react";
import './../App.css'

class Books extends React.Component{

    constructor(props, context) {
        super(props, context);
        this.state = {
            error : null ,
            isLoaded: false ,
            items:[]
        } ;
    }

    componentDidMount() {
        fetch('https://randomuser.me/api')
            .then(res => res.json())
            .then(
                (json) => {
                    this.setState((prevSate) => {
                        return{
                            isLoaded: true ,
                            items: json.results
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
             return(<div>Loading....</div>)

            }
         else {
             return(
                <div>
                    {items.map(
                        item => (
                            <div>
                                {item.gender}
                            </div>
                        )
                    )}
                </div>
             );
            }
    }


}

export default Books ;