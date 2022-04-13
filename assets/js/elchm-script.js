jQuery(function ($){
    let _elcmTarget = $(".elcm-nav-parents ul li");
    let _elcmTargetFirst = $(".elcm-nav-parents ul li:first-child");
    let _elcmSubMenuElm = $(".elcm-nav-content");
    let _elcmNavBtn = $("#elcm-nav-open-btn");
    _elcmTargetFirst.addClass('elcm-active');

    let _elcmSubMenu = $(".elcm-nav-childs .elcm-sub-menu");
    _elcmTarget.mouseover(function (){
        let handler = $(this);
        let _id = handler.attr('id');
        handler.addClass('elcm-active');
        _elcmTarget.removeClass('elcm-active');
        _elcmSubMenu.each(function (){
            let _self = $(this);
            if (_self.data('target-id') === _id){
                _elcmSubMenu.hide();
                _self.show();
            }
        });
    });

    _elcmSubMenu.mouseover(function (){
        let handler = $(this);
        let _id = handler.data('target-id');
        console.log(_id);
        _elcmTarget.each(function (){
            let _self = $(this);
            if (_self.attr('id') === _id){
                _elcmTarget.removeClass('elcm-active');
                _self.addClass('elcm-active');
            }
        });
    });

    _elcmNavBtn.click(function (event){
        event.preventDefault();
        let handler = $(this);
        if (handler.hasClass('elcm-btn-active')){
            handler.removeClass('elcm-btn-active');
            _elcmSubMenuElm.hide();
        }else{
            handler.addClass('elcm-btn-active');
            _elcmSubMenuElm.show();
            _elcmTargetFirst.addClass('elcm-active');
        }
    });
});