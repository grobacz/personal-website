import React from 'react';
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import Me from "./Page/Me";
import Portfolio from "./Page/Portfolio"
import HomeDesktopLayout from './Component/HomeDesktopLayout';
import HomeHeading from "./Component/HomeHeading";
import Cv from './Component/Cv';

export default function App() {
    return (
        <Router>
            <Switch>
                <Route path="/me">
                    <Me />
                </Route>
                <Route path="/cv">
                    <HomeDesktopLayout component={Cv} />
                </Route>
                <Route path="/portfolio">
                    <Portfolio />
                </Route>
                <Route exact path="/">
                    <HomeDesktopLayout component={HomeHeading} />
                </Route>
            </Switch>
        </Router>
    );
}
