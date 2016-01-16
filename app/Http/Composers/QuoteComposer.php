<?php namespace FashionDifferent\Http\Composers;

use Illuminate\Support\Collection;
use Illuminate\View\View;

class QuoteComposer
{
	public function compose(View $view)
	{
		$view->with('quote', $this->quote());
	}

	private function quote()
	{
		return Collection::make([

			['text' => '“Fashion changes, but style endures.”', 'by' =>'Coco Chanel'],
			['text' => '“Fashion is not something that exists in dresses only. Fashion is in the sky, in the street, fashion has to do with ideas, the way we live, what is happening.”', 'by' =>'Coco Chanel'],
			['text' => '“Style is knowing who you are, what you want to say, and not giving a damn”', 'by' => 'Orson Welles'],
			['text' => '“Fashions fade, style is eternal.”', 'by' => 'Yves Saint-Laurent'],
			['text' => '“Don\'t look to the approval of others for your mental stability”', 'by' => 'Karl Lagerfeld'],
			['text' => '“...you don\'t have to be perfect to be pretty”', 'by' => 'Carson Kressley']

		])->random();
	}
}