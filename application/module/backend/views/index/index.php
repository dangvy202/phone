<div class="row justify-content-center">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo $this->countGroup;?></h3>
                <p>Group</p>
            </div>
            <div class="icon text-white">
                <i class="ion ion-ios-people"></i>
            </div>
            <a href="index.php?module=backend&controller=group&action=index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo $this->countUser?></h3>
                <p>User</p>
            </div>
            <div class="icon text-white">
                <i class="ion ion-ios-person"></i>
            </div>
            <a href="index.php?module=backend&controller=user&action=index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo $this->countCategory?></h3>
                <p>Category</p>
            </div>
            <div class="icon text-white">
                <i class="ion ion-clipboard"></i>
            </div>
            <a href="index.php?module=backend&controller=category&action=index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo $this->countProduct; ?></h3>
                <p>Book</p>
            </div>
            <div class="icon text-white">
                <i class="ion ion-ios-book"></i>
            </div>
            <a href="index.php?module=backend&controller=product&action=index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>