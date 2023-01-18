import React, {useState, useEffect} from 'react'
import axios from 'axios'
import RowTable from './RowTable'

const Settings = () => {
    const [firstname, SetFirstName] = useState('')
    const [lastname, SetLastName] = useState('')
    const [email, SetEmail] = useState('')

    const url = `${appLocalizer.apiUrl}/fp/v1/settings`

    const handleSubmit = (e) => {
        e.preventDefault()
        axios.post(url, {
            firstname: firstname,
            lastname: lastname,
            email: email
        }).then((res) => {
            console.log('Submitted')
        })
    }
    useEffect(() => {
        axios.get(url).then((res) => {
            SetFirstName(res.data.firstname)
            SetLastName(res.data.lastname)
            SetEmail(res.data.email)
        })
    }, [])

    return (
        <React.Fragment>
            <form id='work-settings-form' onSubmit={(e ) => handleSubmit(e)}>
                <table className='form-table' role="presentation">
                    <tbody>
                         <tr>
                            <th scope="row">
                                <label htmlFor="firstname">Firstname</label>
                            </th>
                            <td>
                                <input id="firstname" name="firstname" value={firstname}  onChange={ (e) => { SetFirstName( e.target.value ) } } />
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label htmlFor="lastname">Lastname</label>
                            </th>
                            <td>
                                <input id="lastname" name="lastname" value={lastname}  onChange={ (e) => { SetLastName( e.target.value ) } }  />
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label htmlFor="email">Email</label>
                            </th>
                            <td>
                                <input id="email" name="email" value={email}  onChange={ (e) => { SetEmail( e.target.value ) } } />
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p className=''>
                    <button type='submit' className='button button-primary'>Save</button>
                </p>
            </form>
        </React.Fragment>
    )
}


export default Settings;