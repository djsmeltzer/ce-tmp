import React from 'react'
import './EmailForm.css';

class EmailForm extends React.Component {
    constructor(props) {
        super(props)

        this.state = {
            message: '',
            firstName: '',
            lastName: '',
            email: '',
            phone: '',
            zip: '',
            emailme: false,
            callme: false,
            textme: false
        }
    }

    handleChange = (event) => {
        let name = event.target.name
        let value = event.target.value
        this.setState({[name]: value})
    }

    handleCheck = (event) => {
        let name = event.target.name
        let value = this.state[name]
        this.setState({[name]: !value})
    }

    initiateSend = () => {
        console.log('send clicked')
    }

    render() {
        return (
            <div className="email-form">
            <h1>Contact Us</h1>
            <p>I would like to request more informationnon this make model.</p>
            <textarea name="message" onChange={this.handleChange} value={this.state.message} placeholder="Your questions/request"></textarea>
            <p>Please email or call me back as soon as possible with more information.<br />
              Thank You,
            </p>
            <section className="name-input">
              <input type="text" name="firstName" placeholder="First Name" value={this.state.firstName} onChange={this.handleChange}></input>
              <input type="text" name="lastName" placeholder="Last Name" value={this.state.lastName} onChange={this.handleChange}></input>
            </section>
            <input type="text" name="phone" placeholder="Phone" value={this.state.phone} onChange={this.handleChange}></input>
            <input type="text" name="email" className={this.state.emailme ? "required" : undefined} placeholder="Email" value={this.state.email} onChange={this.handleChange}></input>
            <input type="text" name="zip" placeholder="Zip Code" value={this.state.zip} onChange={this.handleChange}></input>
            <p>How should we contact you?</p>
            <section className="contact-preference">
            <label><input type="checkbox" name="callme" onChange={this.handleCheck} checked={this.state.callme}></input> Call</label>
            <label><input type="checkbox" name="textme" onChange={this.handleCheck} checked={this.state.textme}></input> Text</label>
            <label><input type="checkbox" name="emailme" onChange={this.handleCheck} checked={this.state.emailme}></input> Email</label>
            </section>
            <section>
              <button onClick={this.initiateSend}>Send Request</button>
            </section>
          </div>
        )
    }
}

export default EmailForm