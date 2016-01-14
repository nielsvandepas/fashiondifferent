<?php

namespace FashionDifferent\Http\Controllers;

use Illuminate\Http\Request;

use FashionDifferent\Element;
use FashionDifferent\ElementType;
use FashionDifferent\Http\Requests;
use FashionDifferent\Http\Requests\ElementRequest;
use FashionDifferent\Http\Requests\UpdateElementRequest;
use FashionDifferent\Http\Controllers\Controller;

use FashionDifferent\Services\ImageService;

use Carbon\Carbon;

use Auth;
use Flash;
use Image;
use Input;

class ElementController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['except' => [
			'index',
			'show',
			'wardrobe'
		]]);
	}

    /**
     * There is no real index page available on this element,
	 * instead redirect the user to a random element here.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('element.show', [$this->randomId()]);
    }

    /**
     * Show the form for creating a new element.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$types = ElementType::lists('plural', 'type');

        return view('elements.addnew', compact('types'));
    }

    /**
     * Store a newly created element in storage.
     *
     * @param  \FashionDifferent\Http\Requests\ElementRequest  $request
	 * @param  \FashionDifferent\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function store(ElementRequest $request, Element $element)
    {
        $element->fill($request->all());
		$element->image = ImageService::processImage('element-images');
		Auth::user()->elements()->save($element);

		Flash::success('Your element has been added successfully!');

		return redirect()->route('element.show', [$element->id]);
    }

    /**
     * Display the specified element.
     *
     * @param  \FashionDifferent\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function show(Element $element)
    {
		$typeshop = $element->type;

		if (!is_null($element->shop))
			$typeshop .= ', ' . $element->shop;

		$user = null;

		if (Auth::check())
			$user = Auth::user()->toJSON();

        return view('elements.index', compact('element', 'typeshop', 'user'));
    }

    /**
     * Show the form for editing the specified element.
     *
     * @param  \FashionDifferent\Element $element
     * @return \Illuminate\Http\Response
     */
    public function edit(Element $element)
    {
		$types = ElementType::lists('plural', 'plural');

		return view('elements.edit', compact('element', 'types'));
    }

    /**
     * Update the specified element in storage.
     *
     * @param  \FashionDifferent\Http\Requests\UpdateElementRequest  $request
     * @param  \FashionDifferent\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateElementRequest $request, Element $element)
    {
        $element->fill($request->all());

		if (!is_null(Input::file('image')))
			$element->image = ImageService::processImage('element-images');

		$element->save();

		Flash::success('Your element has been updated successfully!');

		return redirect()->route('element.show', [$element->id]);
    }

    /**
     * Remove the specified element from storage.
     *
     * @param  \FashionDifferent\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function destroy(Element $element)
    {
        $element->delete();
    }

	public function wardrobe()
	{
		$output = array();

		for ($i = 0; $i < 10; $i++)
		{
			$output[$i] = Element::random();
		}

		return $output;
	}

	private function randomId()
	{
		return Element::all(['id'])->random()['id'];
	}
}
