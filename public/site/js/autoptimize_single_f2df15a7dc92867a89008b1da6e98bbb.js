"use strict";(function($){$(".venobox img").each(function(){$(this).attr('src',$(this).attr('src').replace("-400x336",""));});const LIST_ITEM='LI';const CHOSEN_MARKER_LIST='chosen_marker_dealer_list.png';const CHOSEN_MARKER_MAP='chosen_marker_dealer_map.png';const initialSelectedStore={storeId:null,storeTitle:null,}
let selectedStore;function setSelectedStore({storeId,storeTitle}){selectedStore={storeId,storeTitle,}}
function clearSelectedStore(){$(`li[data-store-id=${selectedStore.storeId}]`).find('strong').each(function(){this.style.color='initial'});}
function handleMouseOver(){this.style.cursor='pointer';}
function handleMouseOut(e){const $locationTitle=$(this).find('.location-title strong');const storeTitle=$locationTitle.text();const $locationMarkerImg=$(`div[title='${storeTitle}'] img`);$(this).find('strong').not($locationTitle).each(function(){this.style.color='initial'});}
function handleClick(e){if(selectedStore.storeId&&selectedStore.storeTitle){clearSelectedStore();}
const $locationTitle=$(this).find('.location-title strong');const storeTitle=$locationTitle.text();const storeId=this.dataset.storeId;const $locationMarkerImg=$(`div[title='${storeTitle}'] img`);$locationMarkerImg.attr('src',`${WPURLS.images}${CHOSEN_MARKER_MAP}`);$(this).find('strong').not($locationTitle).each(function(){this.style.color='#E91C24';});setSelectedStore({storeId,storeTitle});}
$('body').on('DOMNodeInserted','#wpsl-stores ul',function(e){if(e.target.nodeName==LIST_ITEM){setSelectedStore(initialSelectedStore);$(e.target).on('mouseover',handleMouseOver);$(e.target).on('click',handleClick);}});})(jQuery);