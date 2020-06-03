import React , {Component} from 'react'
import {Modal  , Button , Row , Col , Form} from 'react-bootstrap' ;
export class ComponentModal extends Component{

    constructor(props) {
        super(props);
    }

    render() {
        return(
            <Modal
                {...this.props}
                size="lg"
                aria-labelledby="contained-modal-title-vcenter"
                centered
                style={{direction:"rtl", textAlign:"right"}}
            >
                <Modal.Header>
                    <Modal.Title id="contained-modal-title-vcenter">
                        {this.props.title}
                    </Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <p>
                        {this.props.question}
                    </p>
                </Modal.Body>
                <Modal.Footer>
                    <Button onClick={this.props.onHide}>{this.props.close}</Button>
                    <Button onClick={this.props.action}>{this.props.operation}</Button>
                </Modal.Footer>
            </Modal>
        )
    }
}


