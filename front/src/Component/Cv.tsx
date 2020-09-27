import React, { AriaAttributes, DOMAttributes } from "react";
import { Container, Header } from 'semantic-ui-react'
import useScript from '../tools/useScript';

interface HTMLAttributes<T> extends AriaAttributes, DOMAttributes<T> {
    dataVersion?: string;
    dataSize?: string;
    dataLocale?: string;
    dataType?: string;
    dataTheme?: string;
    dataVanity?: string;
}

const Cv = () => {
    useScript('https://platform.linkedin.com/badges/js/profile.js')

    return <Container>
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
        <div className="LI-profile-badge" data-version="v1" data-size="medium" data-locale="pl_PL" data-type="vertical" data-theme="dark" data-vanity="mateusz-dąbrowski-a4172878">
            <a className="LI-simple-link" href='https://pl.linkedin.com/in/mateusz-d%C4%85browski-a4172878?trk=profile-badge'>Mateusz Dąbrowski</a>
        </div>
    </Container>
}

export default Cv
