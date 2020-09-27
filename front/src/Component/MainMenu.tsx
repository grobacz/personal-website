import React from "react";
import {
    Container,
    Menu,
    MenuProps
} from "semantic-ui-react";
import { Link } from "react-router-dom";
import HomeHeading from './HomeHeading';
import Cv from './Cv';

interface MainMenuProps {
    selected: Function
}

const MainMenu = (props: MenuProps | MainMenuProps) => {
    const { selected, ...innerProps } = props
    return <Menu {...innerProps}>
        <Container>
            <Menu.Item active={selected === HomeHeading}>
                <Link to="/"> Home </Link>
            </Menu.Item>
            <Menu.Item>
                <Link to="/me"> Me </Link>
            </Menu.Item>
            <Menu.Item>
                <Link to="/skills"> Skills </Link>
            </Menu.Item>
            <Menu.Item active={selected === Cv}>
                <Link to="/cv"> CV </Link>
            </Menu.Item>
            <Menu.Item>
                <Link to="/portfolio"> Portfolio </Link>
            </Menu.Item>
        </Container>
    </Menu>
}

export default MainMenu