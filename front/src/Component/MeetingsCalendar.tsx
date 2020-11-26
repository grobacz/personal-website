import React from "react";
import {Header, Segment} from "semantic-ui-react";
import Calendar from "react-calendar";
import 'react-calendar/dist/Calendar.css';

const MeetingsCalendar = () => {

    const onClick = () => {
        fetch('/api/meeting/create', {
            method: 'POST',
            cache: 'no-cache',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                date: new Date(),
                description: 'Testing creation of meeting',
                contact: {name: "Tester"}
            })
        })
            .then((response) => response.json())
            .then((content) => { console.log(content.text) })
    }

    const onClick2 = () => {
        fetch('/api/meeting/confirm?meeting=2')
            .then((response) => response.json())
            .then((content) => { console.log(content.text) })
    }

    // @ts-ignore
    // @ts-ignore
    return (
        <Segment
            inverted
            textAlign="center"
            className={"fill-window"}
            style={{
                padding: "1em 0em",
            }}
            horizontal
        >
            <Header
                as='h1'
                content='Schedule an event'
                style={{
                    fontSize: '4em',
                    fontWeight: 'normal',
                    marginBottom: 0,
                }}
            />
            <Calendar
                minDate={new Date(new Date().setDate(new Date().getDate() + 1))}
            />
            <button onClick={onClick}>Create meeting</button>
            <button onClick={onClick2}>Confirm meeting (as admin)</button>
        </Segment>
    )
}

export default MeetingsCalendar