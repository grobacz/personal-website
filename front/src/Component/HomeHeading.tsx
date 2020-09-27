import React from "react";
import { Container, Header } from 'semantic-ui-react'

const HomeHeading = () => (
    <Container text>
        <Header
            as='h1'
            content='UI ~ MD'
            inverted
            style={{
                fontSize: '4em',
                fontWeight: 'normal',
                marginBottom: 0,
                marginTop: '3em',
            }}
        />
        <Header
            as='h2'
            content='Here we go again'
            inverted
            style={{
                fontSize: '1.7em',
                fontWeight: 'normal',
                marginTop: '1.5em',
            }}
        />
    </Container>
)

export default HomeHeading
