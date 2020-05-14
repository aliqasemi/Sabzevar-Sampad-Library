import React from "react";
import '../App.css'


class Headers extends React.Component{
    render() {
        return(
            <div>
                <p> سن شما {this.props.age}</p>
            </div>
        )
    }
}
export default Headers;