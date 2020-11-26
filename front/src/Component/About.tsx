import React from "react";
import {Container, Header, Segment} from 'semantic-ui-react'

const About = () => {
    return <Container style={{textAlign: 'left'}}>
        <Segment inverted>
            <Header
                as='h1'
                content='About me'
                inverted
                style={{
                    fontSize: '4em',
                    fontWeight: 'normal',
                    marginBottom: 0,
                }}
            />
            <p>
                I'm a 28 years old software developer. I've studied at Warsaw University of Life Sciences and got B.Sc. title in Computer Sciences, majoring in Software Architecture.
            </p>
            <p>
                In classes an private projects I dabbled in Java, Ruby, Python and few more languages, but nothing serious. In my career I've specialised in web development in PHP and done a lot work in custom CRM software, keeping it alive and retrofitting to new requirements.
            </p>
            <p>
               I've worked also in newer frameworks, focusing mainly on Symfony 4, 5 and their many useful additional components. Recently most of my work was related to asynchronous processing - had to try/use symfony/messenger, swoole and a few more solutions. Also had some exposure to React JS and typescript.
            </p>
            <p>
                All in all, I'm mainly backend developer. I can work with TS and JS in frontend, but I can't create beautifully designed web pages - this is not my strong suit. Though, when it comes to PHP applications, microservices, CI/CD and DevOps - I can handle myself.
            </p>
            <p>
                I'm always open to expand my horizons by learning new technologies, frameworks and getting to know new fields in which web application can be used. 
            </p>
        </Segment>
    </Container>
}

export default About
