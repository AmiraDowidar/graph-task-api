<?php
// api/src/Entity/Graph.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Exception\Exception;

/**
 * A graph.
 *
 * @ORM\Entity
 * @ApiResource
 */
class Graph implements GraphInterface
{
    /**
     * @var int The id of this graph.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The title of this graph.
     *
     * @ORM\Column
     */
    public $title;

    /**
     * @var string The description of this book.
     *
     * @ORM\Column(type="text")
     */
    public $description;

    /**
    * @var vertices[] Available nodes for this graph.
    *
    * @ORM\OneToMany(targetEntity="Vertex", mappedBy="graph", cascade={"persist", "remove"})
    * @ORM\JoinColumn(referencedColumnName="id", unique=true)
    * @ApiSubresource
     *
     * @var array
     */
    protected $vertices;

    public function __construct($id = null, $title = null, $description = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->vertices = array();
    }

    /**
     * {@inheritdoc}
     */
    public function add(VertexInterface $vertex)
    {
        if (array_key_exists($vertex->getId(), $this->getVertices())) {
            throw new Exception('Unable to insert multiple Vertices with the same ID in a Graph');
        }
        $this->vertices[$vertex->getId()] = $vertex;
        return $this;
    }
    /**
     * {@inheritdoc}
     */
    public function getVertex($id)
    {
        $vertices = $this->getVertices();
        if (!array_key_exists($id, $vertices)) {
            throw new Exception("Unable to find $id in the Graph");
        }
        return $vertices[$id];
    }
    /**
     * {@inheritdoc}
     */
    public function getVertices()
    {
        return $this->vertices;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
