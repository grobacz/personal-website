import React from "react";
import { Icon, Menu, Segment, Sidebar } from 'semantic-ui-react'
import { Link, Route, Switch, useRouteMatch } from 'react-router-dom';
import Dummy from '../Component/Dummy';
import MeetingsCalendar from "../Component/MeetingsCalendar";


const Portfolio = () => {
    let { path } = useRouteMatch();

    return <Segment
        inverted
        textAlign="center"
        className={"fill-window"}
        style={{
            padding: "1em 0em"
        }}
        vertical
    >
        <Sidebar.Pushable as={Segment} style={{ border: 'none' }}>
            <Sidebar
                as={Menu}
                animation='push'
                icon='labeled'
                inverted
                vertical
                visible
                width='thin'
            >
                <Menu.Item as={Link} to="/">
                    <Icon name='home' />
                    Home
                </Menu.Item>
                <Menu.Item as={Link} to="/portfolio/test">
                    <Icon name='paragraph' />
                    Test
                </Menu.Item>
                <Menu.Item as={Link} to="/portfolio/calendar">
                    <Icon name='calendar' />
                    Calendar
                </Menu.Item>
            </Sidebar>

            <Sidebar.Pusher style={{ height: '100%' }}>
                <Switch>
                    <Route exact path={path}>
                        <div style={{
                            width: '100%', height: '100%', display: 'flex',
                            alignItems: 'center',
                            justifyContent: 'center'
                        }}>
                            <h3>Find your poison in the left sidebar</h3>
                        </div>
                    </Route>
                    <Route path={`${path}/test`}>
                        <Dummy test="bla" />
                    </Route>
                    <Route path={`${path}/calendar`}>
                        <MeetingsCalendar />
                    </Route>
                </Switch>
            </Sidebar.Pusher>
        </Sidebar.Pushable>
    </Segment>
}

export default Portfolio