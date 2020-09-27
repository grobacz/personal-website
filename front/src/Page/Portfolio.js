import React from "react";
import { Header, Icon, Image, Menu, Segment, Sidebar } from 'semantic-ui-react'
import { Link, Route, Switch, useRouteMatch } from 'react-router-dom';
import Dummy from '../Component/Dummy';


const Portfolio = () => {
    let { path, url } = useRouteMatch();

    return <Segment
        inverted
        textAlign="center"
        className={"fill-window"}
        style={{
            padding: "1em 0em",
        }}
        vertical
    >
        <Sidebar.Pushable as={Segment}>
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
                <Menu.Item as={Link} to="/portfolio/one">
                    <Icon name='paragraph' />
                    Test
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
                    <Route path={`${path}/one`}>
                        <Dummy test="bla" />
                    </Route>
                </Switch>
            </Sidebar.Pusher>
        </Sidebar.Pushable>
    </Segment >;
}

export default Portfolio