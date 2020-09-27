import React, { Component } from "react";
import { createMedia } from "@artsy/fresnel";
import {
    Segment,
    Visibility,
} from "semantic-ui-react";
import PropTypes from "prop-types";
import MainMenu from "./MainMenu";
class HomeDesktopLayout extends Component {
    constructor(props) {
        super(props);
        this.state = {};
    }
    hideFixedMenu() {
        this.setState({
            fixed: false,
        });
    }
    showFixedMenu() {
        this.setState({
            fixed: true,
        });
    }
    render() {
        const { Media } = createMedia({
            breakpoints: {
                s: 0,
                m: 768,
                l: 1024,
            },
        });
        const { children } = this.props;
        const { fixed } = this.state;
        return (
            <Media greaterThan="s">

                <Visibility
                    once={false}
                    onBottomPassed={this.showFixedMenu}
                    onBottomPassedReverse={this.hideFixedMenu}
                >
                    <Segment
                        inverted
                        textAlign="center"
                        className={"fill-window"}
                        style={{
                            padding: "1em 0em",
                        }}
                        vertical
                    >
                        <MainMenu
                            selected={this.props.component}
                            fixed={fixed ? "top" : null}
                            inverted={!fixed}
                            pointing={!fixed}
                            secondary={!fixed}
                            size="large" />
                        <this.props.component />
                    </Segment>
                </Visibility>
            </Media>
        );
    }
}
HomeDesktopLayout.propTypes = {
    component: PropTypes.string.isRequired,
};
export default HomeDesktopLayout;
