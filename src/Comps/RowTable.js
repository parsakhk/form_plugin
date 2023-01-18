import React from 'react'


const RowTable = (props) => {
    const inputname = props.inputname;
    const name = props.name;

    return (
        <tr>
            <th scope='row'>
                <label htmlFor={inputname}>{name}</label>
            </th>
            <td>
                <input id={inputname} name={name} type='text' value={inputname} className='regular-text'></input>
            </td>
        </tr>
    )

}
export default RowTable;