import React from "react";
import { Container, Header } from 'semantic-ui-react'
import PropTypes from 'prop-types'

const HomeHeading = ({ s }) => (
    <Container text>
        <Header
            as='h1'
            content='UI ~ MD'
            inverted
            style={{
                fontSize: s ? '2em' : '4em',
                fontWeight: 'normal',
                marginBottom: 0,
                marginTop: s ? '1.5em' : '3em',
            }}
        />
        <Header
            as='h2'
            content='Here we go again'
            inverted
            style={{
                fontSize: s ? '1.5em' : '1.7em',
                fontWeight: 'normal',
                marginTop: s ? '0.5em' : '1.5em',
            }}
        />
    </Container>
)

HomeHeading.propTypes = {
    s: PropTypes.bool,
}
export default HomeHeading
