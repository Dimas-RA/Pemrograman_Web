document.addEventListener("DOMContentLoaded", function () {
  const sliders = document.querySelectorAll("[data-slider]");

  sliders.forEach((root) => {
    const track = root.querySelector("[data-track]");
    const prevBtn = root.querySelector("[data-prev]");
    const nextBtn = root.querySelector("[data-next]");

    if (!track || !prevBtn || !nextBtn) return;

    let index = 0;

    const getStep = () => {
      const firstItem = track.querySelector(".slider-item");
      if (!firstItem) return 240;

      const itemWidth = firstItem.getBoundingClientRect().width;
      const gap = parseFloat(getComputedStyle(track).gap || "16");
      return itemWidth + gap;
    };

    const maxIndex = () => {
      const viewport = root.querySelector(".slider-viewport");
      if (!viewport) return 0;

      const step = getStep();
      const visible = Math.max(1, Math.floor(viewport.getBoundingClientRect().width / step));
      const totalItems = track.querySelectorAll(".slider-item").length;
      const max = Math.max(0, totalItems - visible);
      return max;
    };

    const render = () => {
      const step = getStep();
      const max = maxIndex();
      if (index < 0) index = 0;
      if (index > max) index = max;

      track.style.transform = `translateX(-${index * step}px)`;
    };

    prevBtn.addEventListener("click", () => {
      index -= 1;
      render();
    });

    nextBtn.addEventListener("click", () => {
      index += 1;
      render();
    });

    window.addEventListener("resize", render);
    render();
  });
});
