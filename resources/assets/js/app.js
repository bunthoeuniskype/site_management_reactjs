require('./bootstrap');
import React from 'react';
import { render } from 'react-dom';
import { Router, Route, browserHistory } from 'react-router';
import MyGlobleSetting from './components/MyGlobleSetting';

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
        <Route path="//admin-bsite" component={Login} >
        </Route>
        <Route path="/admin-bsite/Home" component={Home} />
        <Route path="/admin-bsite/login" component={Login} />
        <Route path="/admin-bsite/members" component={DisplayMember} />
        <Route path="/admin-bsite/members/new" component={CreateMember} />
        <Route path="/admin-bsite/members/edit/:id" component={UpdateMember} />
        <Route path="/admin-bsite/projects" component={DisplayProject} />
        <Route path="/admin-bsite/projects/new" component={CreateProject} />
        <Route path="/admin-bsite/projects/edit/:id" component={UpdateProject} />
        <Route path="/admin-bsite/projects/assign" component={AssignMember} />
        <Route path="/admin-bsite/projects/detail/:id" component={DetailProject} />
        <Route path="/admin-bsite/clients" component={DisplayClient} />
        <Route path="/admin-bsite/clients/new" component={CreateClient} />
        <Route path="/admin-bsite/clients/edit/:id" component={UpdateClient} />
    </Router>,
    document.getElementById('crud-app'));