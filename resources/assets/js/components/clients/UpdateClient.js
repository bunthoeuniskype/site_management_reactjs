import React, {Component} from 'react';
import axios from 'axios';
import { Link } from 'react-router';
import {browserHistory} from 'react-router';
import MyGlobleSetting from '../MyGlobleSetting';
import $ from 'jquery';

class UpdateClient extends Component {
  constructor(props) {
    super(props);
     this.state = { invoice_id: '' , project_name: '' , project_version: '' , program_language: '' , company: '' , name: '' , phone: '' , email: '' , price: '' , maintenance: '' , maintenance_price: '' , term: '' , per_term: '' , start_date: '' , end_date: '' , url: '' , key: '' , status: '' , invoice_id: '' , project_name: '' , project_version: '' , program_language: '' , company: '' , name: '' , phone: '' , email: '' , price: '' , maintenance: '' , maintenance_price: '' , term: '' , per_term: '' , start_date: '' , end_date: '' , url: '' , key: '' , others: '',status:'',  errors: ''};

    this.handleChangeInvoiceId = this.handleChangeInvoiceId.bind(this);
    this.handleChangeProjectName = this.handleChangeProjectName.bind(this);
    this.handleChangeProjctV = this.handleChangeProjctV.bind(this);
    this.handleChangeProjectL = this.handleChangeProjectL.bind(this);
    this.handleChangeCompany = this.handleChangeCompany.bind(this);
    this.handleChangeName = this.handleChangeName.bind(this);
    this.handleChangePhone = this.handleChangePhone.bind(this);
    this.handleChangeEmail = this.handleChangeEmail.bind(this);
    this.handleChangePrice = this.handleChangePrice.bind(this);
    this.handleChangeMaintenance = this.handleChangeMaintenance.bind(this);
    this.handleChangeMaintenancePrice = this.handleChangeMaintenancePrice.bind(this);    
    this.handleChangeTerm = this.handleChangeTerm.bind(this);
    this.handleChangePerTerm = this.handleChangePerTerm.bind(this);
    this.handleChangeStartDate = this.handleChangeStartDate.bind(this);
    this.handleChangeEndDate = this.handleChangeEndDate.bind(this);
    this.handleChangeUrl = this.handleChangeUrl.bind(this);
    this.handleChangeKey = this.handleChangeKey.bind(this);
    this.handleChangeOthers = this.handleChangeOthers.bind(this);
    this.handleChangeStatus = this.handleChangeStatus.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);

  }

   componentDidMount(){
    axios.get(MyGlobleSetting.url + `/api/clients/${this.props.params.id}`)
    .then(response => {
     let res =   response.data;
         this.setState({
          invoice_id: res.invoice_id , project_name: res.project_name , project_version: res.project_version , program_language: res.program_language , company: res.company , name:res.name , phone: res.phone , email: res.email , price: res.price , maintenance:res.maintenance , maintenance_price: res.maintenance_price , term: res.term , per_term: res.per_term , start_date: res.start_date , end_date: res.end_date , url: res.url , key: res.key , status: res.status 
      });
    }).catch(error => {
      this.setState({
        errors: error.response.data.errors
      });
    });
  }

  handleChangeInvoiceId(e){
    this.setState({
      invoice_id: e.target.value
    })    
  }
  handleChangeProjectName(e){
    this.setState({
      project_name: e.target.value
    })
  }
  handleChangeProjctV(e){
    this.setState({
      project_version: e.target.value
    })
  }
  handleChangeProjectL(e){
    this.setState({
      program_language: e.target.value
    })
  }
  handleChangeCompany(e){
    this.setState({
      company: e.target.value
    })
  }
  handleChangeName(e){
    this.setState({
      name : e.target.value
    })
  }
  handleChangePhone(e){
    this.setState({
      phone : e.target.value
    })
  }
   handleChangeEmail(e){
    this.setState({
      email : e.target.value
    })
  }
  handleChangePrice(e){
    this.setState({
      price : e.target.value
    })
  }
  handleChangeMaintenance(e){
    this.setState({
      maintenance : e.target.value
    })
  }
  handleChangeMaintenancePrice(e){
    this.setState({
      maintenance_price : e.target.value
    })
  }
 handleChangeTerm(e){
    this.setState({
      term : e.target.value
    })
  }
handleChangePerTerm(e){
    this.setState({
      per_term : e.target.value
    })
  }
  handleChangeStartDate(e){
    this.setState({
      start_date : e.target.value
    })
  }
 handleChangeEndDate(e){
    this.setState({
      end_date : e.target.value
    })
  }
 handleChangeUrl(e){
    this.setState({
      url : e.target.value
    })
  }
  handleChangeKey(e){
    this.setState({
      key : e.target.value
    })
  }
  handleChangeOthers(e){
    this.setState({
      others : e.target.value
    })
  }
   handleChangeStatus(e){
    this.setState({
      status : e.target.value
    })
  }

  handleSubmit(e){
    e.preventDefault();
    // const formData = new FormData();    
    // formData.append('name',this.state.memberName);   
    const formData = {
        'invoice_id':this.state.invoice_id, 
        'project_name': this.state.project_name,
        'project_version': this.state.project_version, 
        'program_language': this.state.program_language,
        'company': this.state.company, 
        'name': this.state.name,
        'phone': this.state.phone, 
        'email': this.state.email, 
        'price': this.state.price, 
        'maintenance': this.state.maintenance,
        'maintenance_price': this.state.maintenance_price,
        'term': this.state.term,
        'per_term': this.state.per_term, 
        'start_date': this.state.start_date, 
        'end_date': this.state.end_date, 
        'url': this.state.url, 
        'key': this.state.key, 
        'others': this.state.others      
    } 
    // const config = {
    //     headers: {
    //         'content-type': 'multipart/form-data'
    //     }
    // }
 
    let uri = MyGlobleSetting.url + '/api/clients/' + this.props.params.id;
    axios.post(uri, formData).then((response) => {
      browserHistory.push('/clients?ACTION=2');
    });
  }
  render(){
    return (      
      <div className="invoice">
        <form onSubmit={this.handleSubmit} className="form-horizontal"  method="post">
        <div className="row">
         <div className="col-sm-6">
          <div className="form-group">
            <label className="control-label col-sm-4">Invoice Id:</label>
            <div className="col-sm-8">
              <input type="text" name="invoice_id" value={this.state.invoice_id || ""} className="form-control" onChange={this.handleChangeInvoiceId}/>
            </div>
          </div>
         </div> 
        <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">Project Name :</label>
            <div className="col-sm-8">
              <input type="text" className="form-control" value={this.state.project_name || ""} onChange={this.handleChangeProjectName} />
            </div>
          </div>
         </div> 
         <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">Project Version :</label>
            <div className="col-sm-8">
              <input type="text" className="form-control" value={this.state.project_version || ""} onChange={this.handleChangeProjctV} />
            </div>
          </div>
         </div> 
         <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">Program Language :</label>
            <div className="col-sm-8">
              <input type="text" className="form-control" value={this.state.program_language || ""} onChange={this.handleChangeProjectL} />
            </div>
            </div>
         </div>
         <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">Company :</label>
            <div className="col-sm-8">
              <input type="text" className="form-control"  value={this.state.company || ""} onChange={this.handleChangeCompany} />
            </div>
            </div>
         </div>
        <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">Name :</label>
            <div className="col-sm-8">
              <input type="text" className="form-control"  value={this.state.name || ""} onChange={this.handleChangeName} />
            </div>
            </div>
         </div>
         <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">Phone :</label>
            <div className="col-sm-8">
              <input type="text" className="form-control"  value={this.state.phone || ""} onChange={this.handleChangePhone} />
            </div>
            </div>
         </div>
         <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">Email :</label>
            <div className="col-sm-8">
              <input type="text" className="form-control"  value={this.state.email || ""} onChange={this.handleChangeEmail} />
            </div>
            </div>
         </div>
        <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">Price :</label>
            <div className="col-sm-8">
              <input type="text" className="form-control"  value={this.state.price || ""} onChange={this.handleChangePrice} />
            </div>
            </div>
         </div>
        <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">Maintenance :</label>
            <div className="col-sm-8">
              <input type="text" className="form-control"   value={this.state.maintenance || ""} onChange={this.handleChangeMaintenance} />
            </div>
            </div>
         </div>
        <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">Maintenance Price :</label>
            <div className="col-sm-8">
              <input type="text" className="form-control"  value={this.state.maintenance_price || ""} onChange={this.handleChangeMaintenancePrice} />
            </div>
            </div>
         </div>         
         <div className="col-sm-6">
          <div className="form-group">
            <label className="control-label col-sm-4" htmlFor="position">Term :</label>
            <div className="col-sm-8">
              <select className="form-control"  value={this.state.term || ""} onChange={this.handleChangeTerm}>
                <option value="day">Day</option>
                <option value="week">Week</option>
                <option value="month">Month</option>
                <option value="year">Year</option>               
              </select>
            </div>
          </div>     
         </div>
         <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">Per Term :</label>
            <div className="col-sm-8">
              <input type="text" className="form-control"  value={this.state.per_term || ""} onChange={this.handleChangePerTerm} />
            </div>
            </div>
         </div>
         <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">Start Date :</label>
            <div className="col-sm-8">
              <input type="text" className="form-control"  value={this.state.start_date || ""} onChange={this.handleChangeStartDate} />
            </div>
            </div>
         </div>
            <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">End Date :</label>
            <div className="col-sm-8">
              <input type="text" className="form-control"  value={this.state.end_date || ""} onChange={this.handleChangeEndDate} />
            </div>
            </div>
         </div>
        <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">Site Url :</label>
            <div className="col-sm-8"> 
              <input type="text" className="form-control"  value={this.state.url || ""} onChange={this.handleChangeUrl} />
            </div>
            </div>
         </div>
         <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">Licese Key :</label>
            <div className="col-sm-8">
              <input type="text" className="form-control"  value={this.state.key || ""} onChange={this.handleChangeKey} />
            </div>
            </div>
         </div>
          <div className="col-sm-6"> 
          <div className="form-group">
            <label className="control-label col-sm-4">Status :</label>
            <div className="col-sm-8">
              <input type="text" className="form-control"  value={this.state.status || ""} onChange={this.handleChangeStatus} />
            </div>
            </div>
         </div>
         <div className="col-sm-12"> 
          <div className="form-group">
            <label className="control-label col-sm-2">Others :</label>
            <div className="col-sm-10">
              <input type="text" className="form-control"   value={this.state.others || ""} onChange={this.handleChangeOthers} />
            </div>
            </div>
         </div>
         <div className="col-sm-12">    
          <div className="form-group">
            <div className="col-sm-offset-2 col-sm-8">
              <button type="submit" className="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
         </div>   
        </form>
      </div>
    )
  }
}
export default UpdateClient;