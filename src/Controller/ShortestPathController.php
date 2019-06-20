<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ShortestPathService\SPFinderInterface;
use App\Service\ShortestPathService\ShortestPathStrategy;

use Psr\Log\LoggerInterface;

use App\Service\SeedTest\SeedService;

class ShortestPathController extends AbstractController
{

  private $seeder;
  // private $finder;


  public function __construct(SeedService $seeder ){ //  , SPFinderInterface $finder

      $this->seeder = $seeder;
      // $this->finder = $finder;
  }
    /**
     * @Route("/", name="shortest_path")
     */
    public function index()
    {
      $shortestPath = $this->seeder->seedGraph();
      $path = "";

      $numVertices = count($shortestPath);
      $i = 0;
      foreach ($shortestPath as $vertex) {
        $path .= $vertex->getName();
        if(++$i !== $numVertices) {
          $path .= " - ";
        }

      }



      // $this->strategy->solve("dijkstra", $graph, $start, $end);

        return $this->json([
            'message' => 'The Shortest Path is',
            'path' => $path,
        ]);
    }

    function strategy($algo, $graph, $start, $end)
    {

      switch ($algo) {
        case "bfs":
            $algoObj = new BFSFinder($graph, $start, $end);
            break;
        case "dijkstra":
            $algoObj = new DijkstraFinder($graph, $start, $end);
            break;
        default:
            $algoObj = new DijkstraFinder($graph, $start, $end);
          }

      return $algoObj;
    }



}
