import React from 'react'
import EmailForm from './EmailForm'

class Result extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            formOpen: false
        }
    }
    render() {
        return (
            <div>
                <button onClick={() => this.setState({formOpen: true})}>Open Form</button>
                {this.state.formOpen &&
                <EmailForm close={() => this.setState({formOpen: false})}></EmailForm>
                }
            </div>
        )
    }
}

export default Result