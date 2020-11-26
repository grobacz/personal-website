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
            content='Web Developer'
            inverted
            style={{
                fontSize: '1.7em',
                fontWeight: 'normal',
                marginTop: '1.5em',
            }}
        />
        <Header
            as='p'
            content='This site is WIP, I`m trying!'
            inverted
            style={{
                fontSize: '1.0em',
                fontWeight: 'normal',
                marginTop: '8.5em',
            }}
        />
    </Container>
)

export default HomeHeading
