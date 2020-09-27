import React from "react";
import {
    Segment,
    Visibility,
} from "semantic-ui-react";
import MainMenu from "./MainMenu";

interface HomeDesktopLayoutProps {
    component: Function
}

const HomeDesktopLayout = (props: HomeDesktopLayoutProps) => {
    return (
        <Visibility
            once={false}
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
                    selected={props.component}
                    inverted={true}
                    pointing={true}
                    secondary={true}
                    size="large" />
                <props.component />
            </Segment>
        </Visibility>
    );
}

export default HomeDesktopLayout;
