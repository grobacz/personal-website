import React, { AriaAttributes, DOMAttributes } from "react";
import {Container, Grid, GridColumn, Header, Icon, Segment} from 'semantic-ui-react'
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

    return <Grid>
        <GridColumn width="8">
            <Segment inverted>
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
                <div className="LI-profile-badge" data-version="v1" data-size="medium" data-locale="pl_PL" data-type="vertical" data-theme="dark" data-vanity="mateusz-dąbrowski-a4172878">
                    <a className="LI-simple-link" href='https://pl.linkedin.com/in/mateusz-d%C4%85browski-a4172878?trk=profile-badge'>Mateusz Dąbrowski</a>
                </div>
            </Segment>
        </GridColumn>
        <GridColumn width="8">
            <Segment inverted>
                <Header
                    as='h1'
                    content='Downloads'
                    inverted
                    style={{
                        fontSize: '4em',
                        fontWeight: 'normal',
                        marginBottom: 0,
                    }}
                />
                <a href="https://drive.google.com/file/d/170EkQFt76soL_HSNNjcHH8wrHzhoDmxW/view?usp=sharing" style={{color: "white"}}>
                    <div style={{textAlign: 'left', border: "1px solid blue", margin: "4px 0px"}}>
                        <Icon name="file pdf" size="large"/>
                        <span>Download CV in Polish</span>
                    </div>
                </a>
                <a href="https://drive.google.com/file/d/1d1s6HWArQeRUGVXvQlYwzFNvhvoUEVit/view?usp=sharing" style={{color: "white"}}>
                    <div style={{textAlign: 'left', border: "1px solid blue", margin: "4px 0px"}}>
                        <Icon name="file pdf" size="large"/>
                        <span>Download CV in English</span>
                    </div>
                </a>
            </Segment>
        </GridColumn>
    </Grid>
}

export default Cv
