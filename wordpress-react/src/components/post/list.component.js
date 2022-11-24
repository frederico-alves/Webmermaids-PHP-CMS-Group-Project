import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import Button from 'react-bootstrap/Button'
import axios from 'axios';
import Swal from 'sweetalert2';
import { Buffer } from 'buffer';

export default function List() {

    const [posts, setPosts] = useState([])

    useEffect(()=>{
        fetchPosts() 
    },[])

    const username = 'admin'
    const password = '123'
    const token = Buffer.from(`${username}:${password}`, 'utf8').toString('base64');

    const fetchPosts = async () => {
        await axios.get(`http://localhost/webmermaids-PHP-CMS-group-project/wordpress/wp-json/wp/v2/posts?_embed`).then(({data})=>{
            setPosts(data)
        })
    }

    const deletePost = async (id) => {
        const isConfirm = await Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            return result.isConfirmed
        });

        if(!isConfirm){
            return;
        }

        await axios.delete(`http://localhost/webmermaids-PHP-CMS-group-project/wordpress/wp-json/wp/v2/posts/${id}`, {
            headers: {
                'Authorization': `Basic ${token}`
            }
        }).then(({data})=>{
            Swal.fire({
                icon:"success",
                text:data.message
            })
            fetchPosts()
        }).catch(({response:{data}})=>{
            Swal.fire({
                text:data.message,
                icon:"error"
            })
        })
    }

    return (
    <div className="container">
        <div className="row">
            <div className='col-12'>
                <Link className='btn btn-primary mb-2 float-end' to={"/post/create"}>
                    Create New Post
                </Link>
            </div>
            <div className="col-12">
                <div className="card card-body">
                    <div className="table-responsive">
                        <table className="table table-bordered mb-0 text-center">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                {
                                    posts.length > 0 && (
                                        posts.map((row, key)=>(
                                            <tr key={key}>
                                                <td>{row.title.rendered}</td>
                                                <td>{row.content.rendered}</td>
                                                <td>
                                                    <Link to={`/post/edit/${row.id}`} className='btn btn-success me-2'>
                                                        Edit
                                                    </Link>
                                                    <Button variant="danger" onClick={()=>deletePost(row.id)}>
                                                        Delete
                                                    </Button>
                                                </td>
                                            </tr>
                                        ))
                                    )
                                } 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    )
}