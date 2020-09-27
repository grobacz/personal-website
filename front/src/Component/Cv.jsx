import React from "react";
import { Container, Header } from 'semantic-ui-react'
import ScriptTag from 'react-script-tag';

const Cv = () => (
    <Container>
        <Container text>
            <Header
                as='h1'
                content='Linkedin'
                inverted
                style={{
                    fontSize: '4em',
                    fontWeight: 'normal',
                    marginBottom: 0,
                }}
            />
        </Container>
        <div class="LI-profile-badge" data-version="v1" data-size="medium" data-locale="pl_PL" data-type="vertical" data-theme="dark" data-vanity="mateusz-dąbrowski-a4172878"><a class="LI-simple-link" href='https://pl.linkedin.com/in/mateusz-d%C4%85browski-a4172878?trk=profile-badge'>Mateusz Dąbrowski</a></div>
        <ScriptTag type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer />
    </Container>
)

export default Cv
