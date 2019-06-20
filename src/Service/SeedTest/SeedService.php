<?php

namespace App\Service\SeedTest;

use Doctrine\ORM\EntityManagerInterface;
use App\Exception\Exception;
use App\Entity\Graph;
use App\Entity\Vertex;


use App\Service\ShortestPathService\DijkstraFinder;

class SeedService
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function seedGraph(){


      $graph = new Graph(2 , 'Task Graph all', 'The test graph to validate the code');



      $v5 = new Vertex(1, '5');
      $v2 = new Vertex(2,'2');
      $v11 = new Vertex(3,'11');
      $v10 = new Vertex(4,'10');
      $v7 = new Vertex(5,'7');
      $v9 = new Vertex(6,'9');
      $v8 = new Vertex(7,'8');
      $v3 = new Vertex(8,'3');

      // // tell Doctrine you want to (eventually) save the Product (no queries yet)
      //  $this->em->persist($v5);
      //
      //  // actually executes the queries (i.e. the INSERT query)
      //  $this->em->flush();





      $v5->connect($v11, 1);
      // var_dump($v5);die;
      $v11->connect($v2, 1);
      $v11->connect($v9, 1);
      $v11->connect($v10, 1);
      $v7->connect($v11, 1);
      $v7->connect($v8, 1);
      $v3->connect($v10, 1);
      $v3->connect($v11, 1);
      $v8->connect($v9, 1);

      $graph->add($v5);
      $graph->add($v2);
      $graph->add($v11);
      $graph->add($v10);
      $graph->add($v7);
      $graph->add($v9);
      $graph->add($v8);
      $graph->add($v3);



      $dijkstra = new DijkstraFinder($graph, $v5, $v2);
      return $dijkstra->solve();


     // tell Doctrine you want to (eventually) save the Product (no queries yet)
      // $this->em->persist($graph);
      //
      // // actually executes the queries (i.e. the INSERT query)
      // $this->em->flush();
    }
}
