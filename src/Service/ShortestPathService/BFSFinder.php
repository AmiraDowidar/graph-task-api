<?php

namespace App\Service\ShortestPathService;

use App\Exception\Exception;
use App\Entity\GraphInterface;

class BFSFinder implements SPFinderInterface
{

  protected $graph;
  protected $startingVertex;
  protected $endingVertex;

  /**
   * Instantiates a new algorithm, requiring a graph to work with.
   *
   * @param GraphInterface $graph
   */
  public function __construct(GraphInterface $graph, $start, $end)
  {
      $this->graph = $graph;
      $this->startingVertex = $start;
      $this->endingVertex = $end;
  }

/*
* 1. Start with a node, enqueue it and mark it visited.
* 2. Do this while there are nodes on the queue:
*     a. dequeue next node.
*     b. if it's what we want, return true!
*     c. search neighbours, if they haven't been visited,
*        add them to the queue and mark them visited.
*  3. If we haven't found our node, return false.
 *
 * @returns array or false
 */
function solve( ) {
$start = $this->startingVertex;
 $end = $this->endingVertex;
  $graph = $this->graph;

    $queue = new SplQueue();
    # Enqueue the path
    $queue->enqueue([$start]);
    $visited = [$start];
    while ($queue->count() > 0) {
        $path = $queue->dequeue();
        # Get the last node on the path
        # so we can check if we're at the end
        $node = $path[sizeof($path) - 1];

        if ($node === $end) {
            return $path;
        }
        foreach ($graph[$node] as $neighbour) {
            if (!in_array($neighbour, $visited)) {
                $visited[] = $neighbour;
                # Build new path appending the neighbour then and enqueue it
                $new_path = $path;
                $new_path[] = $neighbour;
                $queue->enqueue($new_path);
            }
        };
    }
    return false;
}

}
