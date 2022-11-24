import * as React from "react";
import Navbar from "react-bootstrap/Navbar";
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import "bootstrap/dist/css/bootstrap.css";

import { BrowserRouter as Router , Routes, Route, Link } from "react-router-dom";

import EditPost from "./components/post/edit.component";
import PostList from "./components/post/list.component";
import CreatePost from "./components/post/create.component";

function App() {
  return (<Router>
    <Navbar bg="primary">
      <Container>
        <Link to={"/"} className="navbar-brand text-white">
          Laravel - React
        </Link>
      </Container>
    </Navbar>

    <Container className="mt-5">
      <Row>
        <Col md={12}>
          <Routes>
            <Route path="/post/create" element={<CreatePost />} />
            <Route path="/post/edit/:id" element={<EditPost />} />
            <Route exact path='/' element={<PostList />} />
          </Routes>
        </Col>
      </Row>
    </Container>
  </Router>);
}

export default App;