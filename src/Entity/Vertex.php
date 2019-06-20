<?php
// api/src/Entity/Node.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToOne;



/**
 * A node.
 *
 * @ORM\Entity
 * @ApiResource
 */
class Vertex implements VertexInterface
{
    /**
     * @var int The id of this node.
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string The name of this vertex.
     *
     * @ORM\Column
     */
    public $name;

    /**
     * @var int The value of this vertex.
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    public $value;

    /**
     * @var Graph The graph this node belongs to.
     *
     * @ORM\ManyToOne(targetEntity="Graph", inversedBy="vertices")
     */
    public $graph;

    /**
     * Returns the identifier of this vertex.
     *
     * @return mixed
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Returns the name of this vertex.
     *
     * @return mixed
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @var int The value of this vertex.
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $potential;

    /**
     * @var int The value of this vertex.
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $potentialFrom;


    /**
     * One vertex have several connections.
     * @OneToMany(targetEntity="Vertex", mappedBy="parent")
     */
     public $connections;


    /**
     * Many connections have One Node.
     * @ManyToOne(targetEntity="Vertex", inversedBy="connections")
     * @JoinColumn(name="parent_id", referencedColumnName="id")
     */
    protected $parent;

    /**
     * @var boolean The value of this vertex.
     *
     * @ORM\Column(type="boolean")
     */
    protected $passed;
    /**
     * Instantiates a new vertex, requiring a ID to avoid collisions.
     *
     * @param mixed $id
     */
    public function __construct($id, $name)
    {
      $this->id = $id;
      $this->name = $name;
      $this->passed = false;
      $this->connections = new ArrayCollection();
    }
    /**
     * Connects the vertex to another $vertex.
     * A $distance, to balance the connection, can be specified.
     *
     * @param Vertex $vertex
     * @param integer $distance
     */
    public function connect(VertexInterface $vertex, $distance = 1)
    {
      // var_dump($this->connections);die;
      $this->connections->set($vertex->getId(), $distance);
          // $this->connections[$vertex->getId()] = $distance;
    }
    /**
     * Returns the connections of the current vertex.
     *
     * @return Array
     */
    public function getConnections()
    {
        return $this->connections;
    }

    /**
     * Returns vertex's potential.
     *
     * @return integer
     */
    public function getPotential()
    {
        return $this->potential;
    }
    /**
     * Returns the vertex which gave to the current vertex its potential.
     *
     * @return App\Entity\Vertex
     */
    public function getPotentialFrom()
    {
        return $this->potentialFrom;
    }
    /**
     * Returns whether the vertex has passed or not.
     *
     * @return boolean
     */
    public function isPassed()
    {
        return $this->passed;
    }
    /**
     * Marks this vertex as passed, meaning that, in the scope of a graph, it
     * has already been processed in order to calculate its potential.
     */
    public function markPassed()
    {
        $this->passed = true;
    }
    /**
     * Sets the potential for the vertex, if the vertex has no potential or the
     * one it has is higher than the new one.
     *
     * @param   integer $potential
     * @param   Vertex $from
     * @return  boolean
     */
    public function setPotential($potential, VertexInterface $from)
    {
        $potential = (int) $potential;
        if (!$this->getPotential() || $potential < $this->getPotential()) {
            $this->potential = $potential;
            $this->potentialFrom = $from;
            return true;
        }
        return false;
    }
}
