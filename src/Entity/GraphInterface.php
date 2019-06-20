<?php

/**
 * Interface Graph
 *
 * @package   App\Entity
 */

namespace App\Entity;

interface GraphInterface
{
    /**
     * Adds a new vertex to the current graph.
     *
     * @param   VertexInterface $vertex
     * @return  GraphInterface
     * @throws  App\Exception\Exception
     */
    public function add(VertexInterface $vertex);

    /**
     * Returns the vertex identified with the $id associated to this graph.
     *
     * @param   mixed $id
     * @return  VertexInterface
     * @throws  App\Exception\Exception
     */
    public function getVertex($id);

    /**
     * Returns all the vertices that belong to this graph.
     *
     * @return Array
     */
    public function getVertices();
}
