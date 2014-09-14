@foreach($reviews as $review)
<li class="reviews-item clearfix">
	<div class="clearfix">
		<div class="reviews-item-cont">
			<div class="reviews-left">
				@if(empty($review->icon))
				<div class="reviews-ava"></div>
				@else
				{{HTML::image($review->icon,$review->author)}}
				@endif
				<div class="user-name">{{{$review->author}}}</div>
				<div class="user-city">{{{$review->city}}}</div>
				<div class="date">
				@if(empty($review->date_publication))
					{{myDateTime::months($review->created_at)}}
				@else
					{{{$review->date_publication}}}
				@endif
				</div>
			</div>
		</div>
		<div class="reviews-right reviews-desc">
			@if($review->raiting > 0)
			<div class="star-rating-desc">
			@foreach($raiting as $index => $value)
				<?php $set = ($review->raiting >= $index+1)?' active-star':'';?>
				<div title="{{$value}}" class="review-star{{$set}}"></div>
			@endforeach
			</div>
			@endif
			<div>
				{{$review->content}}
			</div>
		</div>
	</div>
	@if(!empty($review->admin_answer))
	<div class="admin-responce">
		<div class="reviews-item-cont">
			<div class="reviews-left">
				<div class="reviews-ava admin"></div>
				<div class="user-name">Администратор</div>
				<div class="date">
				@if(empty($review->date_publication))
					{{{myDateTime::months($review->updated_at)}}}
				@else
					{{{$review->date_publication}}}
				@endif
				</div>
			</div>
		</div>
		<div class="reviews-right reviews-desc">
			<div>
				{{$review->admin_answer}}
			</div>
		</div>
	</div>
	@endif
</li>
@endforeach