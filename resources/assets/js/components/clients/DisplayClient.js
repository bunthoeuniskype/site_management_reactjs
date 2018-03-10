import React, {Component} from 'react';
import axios from 'axios';
import { Link } from 'react-router';
import TableRowClient from './TableRowClient';
import MyGlobleSetting from '../MyGlobleSetting';
class DisplayClient extends Component {
  constructor(props) {
   super(props);
   this.state = {value: '', clients: '', messages: ''};
 }
 componentDidMount(){
   let url_browser = MyGlobleSetting.url + '/api/clients';
   if (this.props.location.query.ACTION != undefined) {
    url_browser += '?ACTION=' + this.props.location.query.ACTION;
   }
   axios.get(url_browser)
   .then(response => {
     this.setState({ clients: response.data.clients, messages: response.data.messages});
   })
   .catch(function (error) {
     console.log(error);
   })
 }
 messages() {
   if(this.state.messages instanceof Array){
     return this.state.messages.map((object, i) => {
       return <div className="alert alert-success" key={i}>
                <a href="#" className="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {object}.
              </div>;
     })
   }
 }
 tabRow(){
   if(this.state.clients instanceof Array){
     return this.state.clients.map((object, i) => {
       return <TableRowClient obj={object} key={i} />;
     })
   }
 }
 render(){
  return (
    <div className="invoice">
    <div className="row">
    <div className="col-md-10"></div>
    <div className="col-md-2">
      <a className className="btn btn-medium btn-default" href="/clients/new">New Clients</a>
    </div>
    </div><br />
    <div className="messages">
      {this.messages()}
    </div>
    <table className="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <td>Invoice Id</td>
        <td>Project</td>
        <td>Name</td>
        <td>Phone</td>
        <td>Email</td>
        <td>Company</td>
        <td>Site Url</td>
        <td>Key License</td>
        <td>status</td>        
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
    {this.tabRow()}
    </tbody>
    </table>
    </div>
    )
  }
}
export default DisplayClient;