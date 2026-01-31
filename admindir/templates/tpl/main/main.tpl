<div class="contentmain">
	<div class="main">
		<div class="left_sidebar padding10">
			{include file="left.tpl"}
		</div>
		<div class="right_content ">
			<div class="wrap-tk">
				<div class="wrap-analytic">
					<div class="box-browers">
						<h2 class="box-ttl2">📈 Thống kê trình duyệt truy cập</h2>


						<div class="stats">
							{foreach from=$browser_counts key=browser item=count}
							<div class="card"><strong>{$browser}</strong>
								<span id="online">{$count}<span>
							</div>
							{/foreach}
						</div>

					</div>

					<div class="box-browers">
						<h2>📈 Thống kê truy cập</h2>
						<div class="stats">
							<div class="card"><strong>Đang online</strong>
								<span id="online">{$online_visits}<span>
							</div>
							<div class="card"><strong>Trong tuần</strong>
								<span id="week">{$week_visits}<span>
							</div>
							<div class="card"><strong>Trong tháng</strong>
								<span id="month">{$month_visits}<span>
							</div>
							<div class="card"><strong>Tổng truy cập</strong>
								<span id="total">{$total_visits}<span>
							</div>
						</div>
					</div>
					<div class="box-browers">
						<h2>Thống kê truy cập theo</h2>

						<div class="tk-item --head">
							<div class="tk-item__ttl">THÀNH PHỐ</div>
							<div class="tk-item__total">Lượng truy cập</div>
						</div>
						{foreach from=$region_stats item=row}
						<div class="tk-item">
							<div class="tk-item__ttl">{$row.region}</div>
							<div class="tk-item__total">{$row.total} lượt</div>
						</div>
						{/foreach}

					</div>
				</div>
				<div class="box-browers width-100">
					<h2>🔗 Top links truy cập (từ cao → thấp)</h2>

					<table class="br1">
						<thead>
							<tr>
								<th align="center" class="width-image">Thứ tự</th>
								<th align="left" class="width-ttl">Link</th>
								<th align="center" class="width-action">Lượt truy cập</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$top_links key=i item=row}
							<tr>
								<td align="center">{$i+1}</td>
								<td align="left"><span class="url-cell" title="{$row.url}">{$row.url}</span></td>
								<td align="center"><span class="badge">{$row.total}</span></td>
							</tr>
							{/foreach}
							{if !$top_links}
							<tr>
								<td colspan="3">Không có dữ liệu.</td>
							</tr>
							{/if}
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>