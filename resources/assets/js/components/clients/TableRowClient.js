import React, { Component } from 'react';
import { Link } from 'react-router';
import {browserHistory} from 'react-router';
import MyGlobleSetting from './../MyGlobleSetting';

class TableRowClient extends Component {
  constructor(props) {
    super(props);
    this.handleSubmit = this.handleSubmit.bind(this);
  }
  handleSubmit(event) {
    event.preventDefault();
    var result = confirm("Want to delete?");
    if (result) {
      let uri = MyGlobleSetting.url + `/api/clients/${this.props.obj.id}`;
      axios.delete(uri).then(response => {
        $('#client_' + this.props.obj.id).remove();
        $('.alert-success').remove();
       }).catch(function (error) {
         console.log(error);
      });
      browserHistory.push('/clients');
    }
  }
  render() {
    return (
      <tr id={"client_" + this.props.obj.id}>
      <td>{this.props.obj.invoice_id}</td>
      <td>{this.props.obj.project_name}</td>
      <td>{this.props.obj.name}</td>
      <td>{this.props.obj.phone}</td>
      <td>{this.props.obj.email}</td>
      <td>{this.props.obj.company}</td>
      <td>{this.props.obj.url}</td>
      <td>{this.props.obj.key}</td>
       <td>{this.props.obj.status}</td>
      <td><form onSubmit={this.handleSubmit} method="delete">
      <Link to={"/clients/edit/"+this.props.obj.id} className="btn btn-primary">Edit</Link>
      /<input type="submit" value="Delete" className="btn btn-danger"/>
      </form></td>
      </tr>
      );
    }
  }

  export default TableRowClient;