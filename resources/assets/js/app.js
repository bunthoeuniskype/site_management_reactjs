require('./bootstrap');
import React from 'react';
import { render } from 'react-dom';
import { Router, Route, browserHistory } from 'react-router';

import DisplayMember from './components/DisplayMember';
import CreateMember from './components/CreateMember';
import UpdateMember from './components/UpdateMember';
import DisplayProject from './components/DisplayProject';
import CreateProject from './components/CreateProject';
import UpdateProject from './components/UpdateProject';
import AssignMember from './components/AssignMember';
import DetailProject from './components/DetailProject';
import DisplayClient from './components/clients/DisplayClient';
import CreateClient from './components/clients/CreateClient';
import UpdateClient from './components/clients/UpdateClient';

import Login from './components/auth/Login';
import Home from './components/Home'

render(
    <Router history={browserHistory}>
        <Route path="/" component={Login} >
        </Route>
        <Route path="/Home" component={Home} />
        <Route path="/login" component={Login} />
        <Route path="/members" component={DisplayMember} />
        <Route path="/members/new" component={CreateMember} />
        <Route path="/members/edit/:id" component={UpdateMember} />
        <Route path="/projects" component={DisplayProject} />
        <Route path="/projects/new" component={CreateProject} />
        <Route path="/projects/edit/:id" component={UpdateProject} />
        <Route path="/projects/assign" component={AssignMember} />
        <Route path="/projects/detail/:id" component={DetailProject} />
        <Route path="/clients" component={DisplayClient} />
        <Route path="/clients/new" component={CreateClient} />
        <Route path="/clients/edit/:id" component={UpdateClient} />
    </Router>,
    document.getElementById('crud-app'));